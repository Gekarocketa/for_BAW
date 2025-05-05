document.addEventListener("DOMContentLoaded", function() {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.get('error') === '1') {
    alert('Błędny login lub hasło!');
  }
});
