const config = require('../configs/database');
const mysql = require('mysql');
const pool = mysql.createPool(config);

pool.on('error',(err)=> {
    console.error(err);
});

module.exports ={
    // Ambil data semua mahasiswa
    getDataStudent(req,res){
        pool.getConnection(function(err, connection) {
            if (err) throw err;
            connection.query(
                `
                SELECT * FROM student;
                `
            , function (error, results) {
                if(error) throw error;  
                res.send({ 
                    status: 1, 
                    message: 'Get List Student Successfully!',
                    data: results 
                });
            });
            connection.release();
        })
    },
    // Ambil data mahasiswa berdasarkan NIM
    getDataStudentByNIM(req,res){
        let nim = req.params.nim;
        pool.getConnection(function(err, connection) {
            if (err) throw err;
            connection.query(
                `
                SELECT * FROM student WHERE nim = ?;
                `
            , [nim],
            function (error, results) {
                if(error) throw error;  
                res.send({ 
                    status: 1, 
                    message: 'Get Student Successfully!',
                    data: results
                });
            });
            connection.release();
        })
    },
    // Simpan data mahasiswa
    addDataStudent(req,res){
        let data = {
            nim : req.body.nim,
            name : req.body.name,
            gender : req.body.gender,
            address : req.body.address
        }
        pool.getConnection(function(err, connection) {
            if (err) throw err;
            connection.query(
                `
                INSERT INTO student SET ?;
                `
            , [data],
            function (error, results) {
                if(error) throw error;  
                res.send({ 
                    status: 1,
                    message: 'Student Added Successfully!',
                });
            });
            connection.release();
        })
    },
    // Update data mahasiswa
    editDataStudent(req,res){
        let dataEdit = {
            name : req.body.name,
            gender : req.body.gender,
            address : req.body.address
        }
        let nim = req.params.nim;
        pool.getConnection(function(err, connection) {
            if (err) throw err;
            connection.query(
                `
                UPDATE student SET ? WHERE nim = ?;
                `
            , [dataEdit, nim],
            function (error, results) {
                if(error) throw error;  
                res.send({ 
                    status: 1, 
                    message: 'Student Updated Successfully!',
                });
            });
            connection.release();
        })
    },
    // Delete data mahasiswa
    deleteDataStudent(req,res){
        let nim = req.params.nim;
        pool.getConnection(function(err, connection) {
            if (err) throw err;
            connection.query(
                `
                DELETE FROM student WHERE nim = ?;
                `
            , [nim],
            function (error, results) {
                if(error) throw error;  
                res.send({ 
                    status: 1, 
                    message: 'Student Deleted Successfully.'
                });
            });
            connection.release();
        })
    }
}