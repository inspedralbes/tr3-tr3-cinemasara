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

//funcion para crear una pelicula
export function crearPelicula(pelicula) {
    return new Promise((resolve, reject) => {
        fetch(`${url}peliculas`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(pelicula)
        }).then(response => {
            if (response.status == 200) {
                return response.json();
            } else {
                reject('Error al crear la pelicula');
            }
        }).then(data => {
            JSON.stringify(data);
            resolve(data);
        }).catch(error => {
            reject(error);
        });
    });
}

//funcion para actualizar una pelicula
export function actualizarPelicula(id, pelicula) {
    return new Promise((resolve, reject) => {
        fetch(`${url}peliculas/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(pelicula)
        }).then(response => {
            if (response.status == 200) {
                return response.json();
            } else {
                reject('Error al actualizar la pelicula');
            }
        }).then(data => {
            JSON.stringify(data);
            resolve(data);
        }).catch(error => {
            reject(error);
        });
    });
}

//funcion para borrar una pelicula
export function borrarPelicula(id) {
    return new Promise((resolve, reject) => {
        fetch(`${url}peliculas/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(response => {
            if (response.status == 200) {
                resolve('Pelicula borrada');
            } else {
                reject('Error al borrar la pelicula');
            }
        }).catch(error => {
            reject(error);
        });
    });
}