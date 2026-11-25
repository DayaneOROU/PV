<script>
(function(){
 var app=document.getElementById('app'),mq=matchMedia('(max-width:900px)');
 document.getElementById('burger').onclick=function(){mq.matches?app.classList.toggle('open'):app.classList.toggle('mini')};
 document.getElementById('scrim').onclick=function(){app.classList.remove('open')};
 document.querySelectorAll('[data-toggle]').forEach(function(b){b.onclick=function(){
  var o=b.getAttribute('aria-expanded')==='true';b.setAttribute('aria-expanded',!o);
  document.getElementById(b.getAttribute('aria-controls')).classList.toggle('open',!o)}});
 document.addEventListener('keydown',function(e){if(e.key==='Escape')app.classList.remove('open')});
})();
</script>