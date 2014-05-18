/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery.fn.lupload = function(option){
    //alert(option);
    document.getElementById("upload").innerHTML = "<form action = 'http://localhost:8080/upload' method='post' enctype='multipart/form-data'><input type='text' name='site'/></br><input type='file' name='thefile'/><button type='submit'>Submit the File!</button></form>";
    //document.getElementById("site").innerHTML = "<form action = 'qScrape.php' method='post'><input type='text' name='site'/><button type='submit'>Submit Site!</button></form>";
    return option;
};
