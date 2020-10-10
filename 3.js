bilangan = n => {
    let max = Math.sqrt(n);
    for (let i = 2; i <= max; i++) {
      if (n % i === 0)
        return false;
    }
    return true;
  }
  
      for (let n = 2; n < 192; n++) {
        if (bilangan(n)) {
          document.write(n + '<BR>');
        } 
  }