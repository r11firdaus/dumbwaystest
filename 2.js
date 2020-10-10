hitungVokal = str => {
    let cari = str.split('')
    let vokal = []
    for (let i = 0; i < cari.length; i++) {
        if (cari[i] === 'a' || cari[i] === 'i' || cari[i] === 'u' || cari[i] === 'e' || cari[i] === 'o') {
          vokal.push(cari[i])
        }
    }
          console.log(vokal.length)
}

hitungVokal('programmer')