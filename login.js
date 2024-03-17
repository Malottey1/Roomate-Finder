// In this example, let's assume we have the following objects for users and messages
const users = [
    { username: 'john', password: 'password', fullName: 'John Doe', email: 'john@example.com' },
    { username: 'jane', password: 'password', fullName: 'Jane Doe', email: 'jane@example.com' }
];

const messages = [
    { sender: 'john', receiver: 'jane', content: 'Hello Jane!' },
    { sender: 'jane', receiver: 'john', content: 'Hi John!' }
];

// Utility function to show/hide pages
function showPage(pageId) {
    const pages = document.querySelectorAll('.page');
    pages.forEach(page => {
        if (page.id === pageId) {
            page.classList.add('active');
        } else {
            page.classList.remove('active');
        }
    });
}

// Login functionality
const loginForm = document.getElementById('loginForm');
loginForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const username = loginForm.elements.loginUsername.value;
    const password = loginForm.elements.loginPassword.value;
    const user = users.find(u => u.username === username && u.password === password);
    if (user) {
        showPage('home');
        document.getElementById('userFullName').textContent = user.fullName;
    } else {
        alert('Invalid username or password');
    }
    loginForm.reset();
});

// Register functionality
const registerForm = document.getElementById('registerForm');
registerForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const fullName = registerForm.elements.fullName.value;
    const email = registerForm.elements.email.value;
    const username = registerForm.elements.registerUsername.value;
    const password = registerForm.elements.registerPassword.value;

    // Validation using regular expressions
    const emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    const usernameRegex = /^[a-zA-Z0-9_-]{3,16}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    if (!usernameRegex.test(username)) {
        alert('Username must be 3-16 characters and can contain letters, numbers, underscores, or dashes.');
        return;
    }

    if (!emailRegex.test(email)) {
        alert('Invalid email address.');
        return;
    }

    if (!passwordRegex.test(password)) {
        alert('Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number.');
        return;
    }

    const newUser = { fullName, email, username, password };
    users.push(newUser);
    alert('Registration successful. Please login to continue.');
    showPage('login');
    registerForm.reset();
});

// Logout functionality
const logoutBtn = document.getElementById('logoutBtn');
logoutBtn.addEventListener('click', function () {
    showPage('login');
});

// Message functionality
const backBtn = document.getElementById('backBtn');
backBtn.addEventListener('click', function () {
    showPage('home');
});

const messageList = document.getElementById('messageList');
users.forEach(user => {
    const userMessages = messages.filter(message => message.sender === user.username || message.receiver === user.username);
    userMessages.forEach(message => {
        const sender = users.find(u => u.username === message.sender);
        const receiver = users.find(u => u.username === message.receiver);
        const messageItem = document.createElement('div');
        messageItem.innerHTML = `
            <strong>${sender.fullName}</strong> to <strong>${receiver.fullName}</strong>: ${message.content}
        `;
        messageList.appendChild(messageItem);
    });
});

// Notification functionaliy
const backBtnNotification = document.getElementById('backBtnNotification');
backBtnNotification.addEventListener('click', function () {
    showPage('home');
});

// Profile functionality
const backBtnProfile = document.getElementById('backBtnProfile');
backBtnProfile.addEventListener('click', function () {
    showPage('home');
});

// Notification feature for demonstration purposes
function showNotification() {
    showPage('notification');
}
setTimeout(showNotification, 3000);
