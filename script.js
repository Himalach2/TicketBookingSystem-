function validateForm() {
    var title = document.getElementById('title').value;
    var showtimes = document.getElementById('showtimes').value;
  
    if (title.trim() === '') {
      alert('Please enter the movie title.');
      return false;
    }
  
    if (showtimes.trim() === '') {
      alert('Please enter the showtimes.');
      return false;
    }
  
    return true;
  }
  