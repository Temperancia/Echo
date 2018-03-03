/**
 * Created by Alexandre on 31/05/2017.
 */
var express = require('express');
var router = express.Router();

var User = require('./../models/user');

var bcrypt = require('bcrypt');
const saltRounds = 10;

// User registration
router.post('/user/create', function(req, res) {
    bcrypt.hash(req.body.password, saltRounds, function(err, hash) {
        var user = new User({
            username: req.body.name,
            email: req.body.email,
            password: hash,
            created_at: Date.now()
        });
        user.save(function (err) {
            if (err) return console.error(err);
            var session = req.session;
            session.user = user;
            return res.json({ session: session });
        });
    });
});
router.post('/user/login', function(req, res) {
    req.checkBody('user.name', 'Invalid name').isAlpha();
    req.sanitizeBody('user.name').escape().trim();

    var name = req.body.user.name;
    var password = req.body.user.password;
    var errors = req.validationErrors();

    if (errors) {
        console.log('parshing shit');
    } else {
        User.findOne({username: name}, function (err, user) {
            if (err || user == null) {
                return res.json({ error: true });
            }
            bcrypt.compare(password, user.password, function(err, result) {
                if (err || !result) {
                    return res.json({ error: true });
                }
                var session = req.session;
                session.user = user;
                return res.json({ error: false, session: session });
            });
        });
    }

});
router.get('/user/logout', function(req, res) {
    var session = req.session;
    session.user = null;
    return res.json({ session: session });
});

module.exports = router;
