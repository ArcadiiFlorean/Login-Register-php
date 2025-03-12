<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seabrook Community</title>
    <link rel="stylesheet" href="styles.css">
  
</head>
<body>
    <header>
        <h1>Seabrook Community</h1>
        <nav>
            <ul>
                <li><a href="#about">Despre</a></li>
                <li><a href="#events">Evenimente</a></li>
                <li><a href="#signup">Înregistrare</a></li>
                <li><a href="#login">Autentificare</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    <section id="about">
        <h2>Despre Noi</h2>
        <p>Seabrook este o comunitate de coastă unită, unde organizăm evenimente și activități pentru toți locuitorii.</p>
    </section>
    
    <section id="events">
        <h2>Evenimente</h2>
        <p>Află mai multe despre evenimentele viitoare din comunitatea noastră.</p>
        <input type="text" id="search-input" placeholder="Caută evenimente..." onkeyup="searchEvents()" class="hidden" />
        <input type="date" id="date-input" onchange="filterEventsByDate()" class="hidden" />
        <ul id="events-list" class="hidden">
            <li data-date="2025-06-15" id="event-1">
                Festivalul Mării - 15 iunie
                <div>
                    <input type="text" id="comment-input-event-1" placeholder="Lasă un comentariu" />
                    <button onclick="addComment('event-1')">Adaugă Comentariu</button>
                </div>
                <ul id="comments-event-1"></ul>
            </li>
            <li data-date="2025-06-22" id="event-2">
                Târg de artizanat - 22 iunie
                <div>
                    <input type="text" id="comment-input-event-2" placeholder="Lasă un comentariu" />
                    <button onclick="addComment('event-2')">Adaugă Comentariu</button>
                </div>
                <ul id="comments-event-2"></ul>
            </li>
            <li data-date="2025-06-29" id="event-3">
                Concurs de gătit - 29 iunie
                <div>
                    <input type="text" id="comment-input-event-3" placeholder="Lasă un comentariu" />
                    <button onclick="addComment('event-3')">Adaugă Comentariu</button>
                </div>
                <ul id="comments-event-3"></ul>
            </li>
        </ul>
        <div id="admin-controls" class="hidden">
            <button onclick="editEvent('event-1')">Editează Festivalul Mării</button>
            <button onclick="deleteEvent('event-2')">Șterge Târg de artizanat</button>
        </div>
    </section>
    
    <section id="signup">
        <h2>Înregistrează-te</h2>
        <form action="#" method="POST">
            <label for="name">Nume:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Parolă:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Înregistrează-te</button>
        </form>
    </section>
    
    <section id="login">
        <h2>Autentificare</h2>
        <form id="login-form" onsubmit="login(event)">
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" required>
            
            <label for="login-password">Parolă:</label>
            <input type="password" id="login-password" required>
            
            <button type="submit">Autentifică-te</button>
        </form>
    </section>
    
    <section id="member-section" class="hidden">
        <h2>Secțiune pentru Membri</h2>
        <p>Bine ai venit în secțiunea exclusivă pentru membrii comunității Seabrook!</p>
        <button id="logout-button" onclick="logout()" class="hidden">Deconectare</button>
    </section>
    
    <section id="contact">
        <h2>Contact</h2>
        <p>Ne poți scrie la <a href="mailto:contact@seabrook.com">contact@seabrook.com</a>.</p>
    </section>
    
    <footer>
        <p>&copy; 2025 Seabrook Community</p>
    </footer>
</body>
</html>
