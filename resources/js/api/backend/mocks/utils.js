export function deveMockar() {
    return !!process.env.MIX_GHPAGES_TEST;
}

export function promiseMockadaOuNull(key, resp, err) {
    if (!deveMockar()) {
        return null
    }

    return promiseMockada(key, resp, err)
}

export function promiseMockada(key, resp, err) {
    return new Promise(function(resolve, reject) {
        if (configAtiva(key)) {
            resolve(resp);
        } else {
            reject(err);
        }
    });
}

export function configAtiva(key){
    return getConfig(key) === 'true'
}

export function getConfig(key){
    return localStorage.getItem(`dev_${key}`)
}
