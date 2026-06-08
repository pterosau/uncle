const express = require('express');
const session = require('express-session');
const passport = require('passport');
const LocalStrategy = require('passport-local').Strategy;
const multer = require('multer');
const fs = require('fs');
const path = require('path');

const app = express();
const port = 3000;

// Middleware
app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.use(session({ secret: 'your-secret-key', resave: true, saveUninitialized: true }));
app.use(passport.initialize());
app.use(passport.session());

// Configure Passport
passport.use(new LocalStrategy(
  (username, password, done) => {
    // Authenticate user (in-memory for demonstration, replace with database query)
    if (username === password) {
      return done(null, { id: username, username: username });
    } else {
      return done(null, false, { message: 'Invalid credentials' });
    }
  }
));

passport.serializeUser((user, done) => {
  done(null, user.id);
});

passport.deserializeUser((id, done) => {
  // In a real application, retrieve user information from the database
  done(null, { id: id, username: id });
});

// File storage configuration using multer
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    const userFolder = path.join(__dirname, 'uploads', req.user.id);
    if (!fs.existsSync(userFolder)) {
      fs.mkdirSync(userFolder);
    }
    cb(null, userFolder);
  },
  filename: (req, file, cb) => {
    cb(null, file.originalname);
  }
});

const upload = multer({ storage: storage });

// Routes
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

app.post('/login',
  passport.authenticate('local', { successRedirect: '/dashboard', failureRedirect: '/' })
);

app.get('/dashboard', isAuthenticated, (req, res) => {
  res.sendFile(__dirname + '/dashboard.html');
});

app.post('/upload', isAuthenticated, upload.single('file'), (req, res) => {
  res.send('File uploaded successfully!');
});

// Logout route
app.get('/logout', (req, res) => {
  req.logout();
  res.redirect('/');
});

// Middleware to check if the user is authenticated
function isAuthenticated(req, res, next) {
  if (req.isAuthenticated()) {
    return next();
  }
  res.redirect('/');
}

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
