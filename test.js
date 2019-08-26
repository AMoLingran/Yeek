S = "document.write('<script src=";
A = '';
for (i = 0; i < S.length; i++) {
    A = A + S.charCodeAt(i) + ","
}
console.log(A)