import { Link } from "@inertiajs/react";
import route from "ziggy-js";

interface Props {
    children: React.ReactNode;
}

export default function Authenticated({ children }: Props) {
    return (
        <>
            <Link href={route("logout")} method="post" as="button">
                Log Out
            </Link>

            <div className="min-h-screen bg-gray-100">{children}</div>
        </>
    );
}
