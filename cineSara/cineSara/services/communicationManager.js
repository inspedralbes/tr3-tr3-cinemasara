export function getPeliculas() {
  return new Promise((resolve, reject) => {
      fetch('http://localhost:8000/api/peliculas')
          .then(response => {
              if (response.status == 200) {
                  return response.json();
              } else {
                  reject('Error al obtener las peliculas');
              }
          }).then(data => {
              JSON.stringify(data);
              resolve(data);
          }).catch(error => {
              reject(error);
          });
  });
}

export function getSesion(){
    return new Promise((resolve, reject) => {
        fetch(`http://localhost:8000/api/sesiones/{$id.pelicula}`)
            .then(response => {
                if (response.status == 200) {
                    return response.json();
                } else {
                    reject('Error al obtener las sesiones');
                }
            }).then(data => {
                JSON.stringify(data);
                resolve(data);
            }).catch(error => {
                reject(error);
            });
    });
}