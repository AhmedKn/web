// var mysql = require('mysql');  

// var con = mysql.createConnection({  
//     host: "localhost",  
//     user: "root",  
//     password: "",  
//     database: "gtek"  
//     });  

//     con.connect(function(err) {  
//     if (err) throw err;  
//     console.log("Connected!");  
//     for(let i=0;i<3;i++){
//         var sql = `INSERT INTO commande (id_client,montant,date_enregistrement,etat) VALUES ('4', '99${i}', '2022-04-01 01:43:18','livré')`;  
//     con.query(sql, function (err, result) {  
//     if (err) throw err;  
//     console.log("1 record inserted");  
//     })
//     }
// })

function aff(event) {
    event.preventDefault();
  }