import ziggy from "ziggy-js";

export function route(name: string): string {
    return ziggy(name);
}
