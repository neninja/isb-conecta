export function get(url, body) {
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
