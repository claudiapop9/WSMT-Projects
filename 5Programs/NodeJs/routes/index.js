var express = require('express');
var DataAccess = require('./data_access.js');
var Repository = require('./repository.js');
var router = express.Router();

/* GET home page. */
router.get('/', function (req, res, next) {
    res.render('index', {title: 'Express'});
});

module.exports = router;

var data_access = new DataAccess();
var repository = new Repository(data_access);
repository.getPostOrderTree();

