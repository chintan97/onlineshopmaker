<html>
<head>
<script type="text/javascript">
document.getElementById('one').innerHTML = getOptions(one);
document.getElementById('two').innerHTML = getOptions(two[0]);
var one = ['A', 'B', 'C'];
var two = [['A 1', 'A 2'],['B 1', 'B 2', 'B 3'], ['C 1', 'C 2']];
function getOptions(options) {
    var html = '';
    for (index in options) {
         html += '<option>' + options[index] + '</option>'
    }
    return html;
}
document.getElementById('one').addEventListener('change', function() {
    var index = this.selectedIndex;
    document.getElementById('two').innerHTML = getOptions(two[index]);
});
</script>
</head>
<body>
<select id="one"></select>
<select id="two"></select>
</body>
</html>