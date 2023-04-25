function getIdMovie(){
    let URL = window.location.href;
    console.log(URL)
    let id = URL.split('=')[1];
    return id;
  }
  
  