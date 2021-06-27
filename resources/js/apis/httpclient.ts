import axios from 'axios'

export function get(url, body = null) {
    return new Promise(function(resolve, reject) {
        axios
            .get(url, body)
            .then(resp => {
                resolve(resp.data);
            })
            .catch(err => {
                reject(err);
            });
    });
}

export function post(url, body) {
    return new Promise(function(resolve, reject) {
        axios
            .post(url, body)
            .then(resp => {
                resolve(resp.data);
            })
            .catch(err => {
                reject(err);
            });
    });
}

export function del(url) {
    return new Promise(function(resolve, reject) {
        axios
            .delete(url)
            .then(resp => {
                resolve(resp.data);
            })
            .catch(err => {
                reject(err);
            });
    });
}

export function put(url, body = null) {
    return new Promise(function(resolve, reject) {
        axios
            .put(url, body)
            .then(resp => {
                resolve(resp.data);
            })
            .catch(err => {
                reject(err);
            });
    });
}