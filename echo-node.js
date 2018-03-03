var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');
var expressValidator = require('express-validator');

// db
var mongoose = require('mongoose');
mongoose.connect('mongodb://localhost/echo', function(err) {
    if (err) throw err;
});


// routes

var home = require('./routes/home');

// app
var app = express();
var session = require('express-session');

// view engine setup
app.set('views', path.join(__dirname, '/public/views'));
app.set('view engine', 'jade');

// uncomment after placing your favicon in /public
//app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(expressValidator());
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));
app.use(session({
    secret: 'rsbr frdjkfzei3%',
    cookie: {
      path: '/',
      expires: false, // Alive Until Browser Exits
      httpOnly: true
}}));

app.use(home);

app.get('/partials/templates/:name', function (req, res) {
    res.render('templates/' + req.params.name);
});

app.get('/partials/:name', function (req, res) {
    res.render(req.params.name);
});

app.get("/*", function (req, res) {
    res.render('templates/layout');
});

// catch 404 and forward to error handler
app.use(function(req, res, next) {
    var err = new Error('Not Found');
    err.status = 404;
    next(err);
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
