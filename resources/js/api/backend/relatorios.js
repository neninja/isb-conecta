import { get } from "@/api/httpclient";

export function filtraRelatoriosRecepcao(data, relatorios) {
    return get("/api/recepcao/relatorios", {
        params: {
            data,
            relatorios
        }
    });
}
