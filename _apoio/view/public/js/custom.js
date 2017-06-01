$("#IptCPF").mask("555.555.555-55");
$("#IptTelefone").mask("55 5555-5555");
$("#IptCelular").mask("55 95555-5555");
$("#IptCEP").mask("55555-555");

/*
function validaCNPJ()
{
CNPJ = document.validacao.CNPJID.value;
erro = new String;

if(CNPJ.length < 18) erro += "É necessario preencher corretamente o número do CNPJ! \n\n";

if ((CNPJ.charAt(2) != ".")
|| (CNPJ.charAt(6) != ".")
|| (CNPJ.charAt(10) != "/")
|| (CNPJ.charAt(15) != "-")){
	if (erro.length == 0) erro += "É necessário preencher corretamente o número do CNPJ! \n\n";
}

//substituir os caracteres que não são números
if(document.layers && parseInt(navigator.appVersion) == 4){
x = CNPJ.substring(0,2);
x+= CNPJ. substring (3,6);
x+= CNPJ. substring (7,10);
x+= CNPJ. substring (11,15);
x+= CNPJ. substring (16,18);
CNPJ= x;
17               }
else {
18                       CNPJ
= CNPJ. replace (".","");
19                       CNPJ
= CNPJ. replace (".","");
20                       CNPJ
= CNPJ. replace ("-","");
21                       CNPJ
= CNPJ. replace ("/","");
22               }
23               var
nonNumbers = /\D/;
24               if
(nonNumbers.test(CNPJ)) erro += "A verificação
de CNPJ suporta apenas números! \n\n";
25               var
a = [];
26               var
b = new Number;
27               var
c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
28               for
(i=0; i<12; i++){
29                       a[i]
= CNPJ.charAt(i);
30                       b
+= a[i] * c[i+1];
31 }
32               if
((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
33               b
= 0;
34               for
(y=0; y<13; y++) {
35                       b
+= (a[y] * c[y]);
36               }
37               if
((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
38               if
((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13)
!= a[13])){
39                       erro
+="Dígito verificador com problema!";
40               }
41               if
(erro.length > 0){
42                       alert(erro);
43                       return
false;
44               }
else {
45                       alert("CNPJ
valido!");
46               }
47               return
true;
48       }*/