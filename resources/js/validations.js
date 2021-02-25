const validations = {
    empty(v) {
        if (!v) {
            return "Obrigatório";
        }
        return "";
    }
};

export function validateFromSchema(schema, values, erros, config = null) {
    let failFast = config?.failFast ? true : false;
    let houveErro = false;
    for (let prop in schema) {
        let rules = schema[prop];

        let erro;
        rules.forEach(function(rule) {
            erro = validations[rule](values[prop]);
            erros[prop] = erro;
            if (erro) {
                houveErro = true;
                return erros;
            }
        });

        if (failFast && erro) {
            return { houveErro, erros };
        }
    }
    return { houveErro, erros };
}
