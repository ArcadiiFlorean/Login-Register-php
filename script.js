let currentUser = null; // To keep track of the logged-in user

function login(event) {
    event.preventDefault();
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    
    // Hardcoded user credentials
    const users = [
        { email: 'user@example.com', password: 'password', role: 'user' },
        { email: 'admin@example.com', password: 'adminpassword', role: 'admin' }
    ];
    
    // Check if user is valid
    const user = users.find(u => u.email === email && u.password === password);
    
    if (user) {
        currentUser = user;
        document.getElementById('member-section').classList.remove('hidden');
        document.getElementById('login-form').classList.add('hidden');
        document.getElementById('logout-button').classList.remove('hidden');
        document.getElementById('events-list').classList.remove('hidden');
        document.getElementById('search-bar').classList.remove('hidden');
        document.getElementById('date-filter').classList.remove('hidden');
        
        // Show admin controls if admin
        if (user.role === 'admin') {
            document.getElementById('admin-controls').classList.remove('hidden');
        }
    } else {
        alert('Email sau parolă incorecte.');
    }
}

function logout() {
    currentUser = null;
    document.getElementById('member-section').classList.add('hidden');
    document.getElementById('login-form').classList.remove('hidden');
    document.getElementById('logout-button').classList.add('hidden');
    document.getElementById('events-list').classList.add('hidden');
    document.getElementById('search-bar').classList.add('hidden');
    document.getElementById('date-filter').classList.add('hidden');
    document.getElementById('admin-controls').classList.add('hidden');
}

function searchEvents() {
    const query = document.getElementById('search-input').value.toLowerCase();
    const events = document.querySelectorAll('#events-list li');
    
    events.forEach(event => {
        if (event.textContent.toLowerCase().includes(query)) {
            event.style.display = 'list-item';
        } else {
            event.style.display = 'none';
        }
    });
}

function filterEventsByDate() {
    const selectedDate = document.getElementById('date-input').value;
    const events = document.querySelectorAll('#events-list li');
    
    events.forEach(event => {
        if (event.dataset.date === selectedDate) {
            event.style.display = 'list-item';
        } else {
            event.style.display = 'none';
        }
    });
}

function editEvent(eventId) {
    const eventItem = document.getElementById(eventId);
    const newName = prompt("Modifică numele evenimentului:", eventItem.textContent);
    if (newName) {
        eventItem.textContent = newName;
    }
}

function deleteEvent(eventId) {
    const eventItem = document.getElementById(eventId);
    if (confirm("Sigur vrei să ștergi acest eveniment?")) {
        eventItem.remove();
    }
}

function addComment(eventId) {
    if (!currentUser) {
        alert("Te rugăm să te autentifici pentru a lăsa un comentariu.");
        return;
    }
    const commentText = document.getElementById(`comment-input-${eventId}`).value;
    if (commentText.trim() !== "") {
        const commentList = document.getElementById(`comments-${eventId}`);
        const newComment = document.createElement("li");
        newComment.textContent = `${currentUser.email}: ${commentText}`;
        commentList.appendChild(newComment);
        document.getElementById(`comment-input-${eventId}`).value = ""; // Clear the input
    } else {
        alert("Te rugăm să introduci un comentariu.");
    }
}