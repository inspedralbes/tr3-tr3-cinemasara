// const url = 'http://localhost:8000/api/';
// const url = 'http://tr3.a21sarmarbau.daw.inspedralbes.cat/back/laravel/public/api/';
const url = 'http://localhost:8000/api/';

export function getPeliculas() {
    return new Promise((resolve, reject) => {
        fetch(`${url}peliculas`)
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

export function getPeliculaId(id) {
    return new Promise((resolve, reject) => {
        fetch(`${url}peliculas/${id}`)
            .then(response => {
                if (response.status == 200) {
                    return response.json();
                } else {
                    reject('Error al obtener la pelicula');
                }
            }).then(data => {
                JSON.stringify(data);
                resolve(data);
            }).catch(error => {
                reject(error);
            });
    });
}

export function getSesionesIdPelicula(id) {
    return new Promise((resolve, reject) => {
        fetch(`${url}sesiones/${id}`)
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

export function comprarEntradas(entradas) {
    return new Promise((resolve, reject) => {
        fetch(`${url}entradas`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(entradas)
        }).then(response => {
            if (response.status == 201) {
                return response.json();
            } else {
                reject('Error al comprar las entradas');
            }
        }).then(data => {
            JSON.stringify(data);
            resolve(data);
        }).catch(error => {
            reject(error);
        });
    });
}