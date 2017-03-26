var fs=require("fs");
var readerStream = fs.createReadStream('input.txt');
var writterStream = fs.createWriteStream('output.txt');
readerStream.pipe(writeStream);
console.log("Program Ended");