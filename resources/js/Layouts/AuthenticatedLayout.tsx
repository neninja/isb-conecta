import { Link } from "@inertiajs/inertia-react";
import route from "ziggy-js";

export default function Authenticated({ auth, children }) {
    return (
        <>
            <Link href={route('logout')} method="post" as="button">
                Log Out
            </Link>

            <div className="min-h-screen bg-gray-100">
                {children}
            </div>
        </>
    );
}
