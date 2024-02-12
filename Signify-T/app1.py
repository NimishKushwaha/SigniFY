from flask import Flask, render_template
import subprocess
import threading
from function import *
from keras.utils import to_categorical
from keras.models import model_from_json
from keras.layers import LSTM, Dense
from keras.callbacks import TensorBoard

app = Flask(__name__)

# Load your model and other necessary code here
json_file = open("model.json", "r")
model_json = json_file.read()
json_file.close()
model = model_from_json(model_json)
model.load_weights("model.h5")

colors = [(245, 117, 16) for _ in range(20)]
threshold = 0.8

def prob_viz(res, actions, input_frame):
    output_frame = input_frame.copy()
    for num, prob in enumerate(res):
        cv2.rectangle(output_frame, (0, 60+num*40), (int(prob*100), 90+num*40), colors[num], -1)
        cv2.putText(output_frame, actions[num], (0, 85+num*40), cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 255, 255), 2, cv2.LINE_AA)

    return output_frame

# 1. New detection variables
sequence = []
sentence = []
accuracy = []
predictions = []

threshold = 0.8 

cap = cv2.VideoCapture(0)

# Set mediapipe model 
with mp_hands.Hands(
    model_complexity=0,
    min_detection_confidence=0.5,
    min_tracking_confidence=0.5) as hands:

    @app.route('/')
    def index():
        return render_template('index.html')

    @app.route('/start_script')
    def start_script(): 
        def run_script():
            try:
                subprocess.run(["python", "app.py"])
                print("Script started successfully!")
            except Exception as e:
                print(f"Error: {str(e)}")

        # Run the script in a separate thread to avoid blocking the Flask app
        script_thread = threading.Thread(target=run_script)
        script_thread.start()

        return "Check the console for output.Click Q to exit the console"

    if __name__== '_main_':
        app.run(debug=True)