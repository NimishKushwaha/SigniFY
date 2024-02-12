// Define the sign language alphabet
const signLanguageAlphabet = [
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
    'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
];

let currentIndex = 0; // Index of the currently displayed alphabet

// Elements
const signAlphabetElement = document.querySelector('.sign-alphabet');
const progressPercentageElement = document.getElementById('progressPercentage');
const progressBarElement = document.getElementById('progressBar');

// Function to display the current alphabet and update progress
function displayAlphabet(index) {
    if (index >= 0 && index < signLanguageAlphabet.length) {
        signAlphabetElement.textContent = signLanguageAlphabet[index];
        currentIndex = index;
        updateProgress();
    }
}

// Function to update progress
function updateProgress() {
    const progress = ((currentIndex + 1) / signLanguageAlphabet.length) * 100;
    progressPercentageElement.textContent = `${progress.toFixed(2)}%`;
    progressBarElement.value = progress;
}

// Event listeners for next and previous buttons
document.getElementById('nextButton').addEventListener('click', () => {
    currentIndex++;
    if (currentIndex >= signLanguageAlphabet.length) {
        currentIndex = 0; // Wrap around to the beginning
    }
    displayAlphabet(currentIndex);
});

document.getElementById('prevButton').addEventListener('click', () => {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = signLanguageAlphabet.length - 1; // Wrap around to the end
    }
    displayAlphabet(currentIndex);
});

// Initialize the display
displayAlphabet(currentIndex);
