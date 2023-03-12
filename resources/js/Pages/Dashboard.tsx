import { Head, Link } from "@inertiajs/react";
import route from "ziggy-js";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

export default function Dashboard() {
    return (
        <AuthenticatedLayout>
            <Head title="Dashboard" />

            <h1>Central de setores</h1>

            <ul aria-label="setores">
                <li>
                    <Link href={route("relatorios-recepcao")}>Recepção</Link>
                </li>
                <li>
                    <Link href="relatorios/educadores">Educadores</Link>
                </li>
            </ul>
        </AuthenticatedLayout>
    );
}
