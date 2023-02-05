import { Head, Link } from "@inertiajs/inertia-react";
import { useEffect } from "react";
import route from "ziggy-js";

interface Auth {
    user: User;
}

interface User {
    id: number;
    name: string;
    email: string;
}

interface Props {
    auth: Auth;
    canLogin: boolean;
}

export default function Welcome(props: Props) {
    useEffect(() => {
        console.log(props);
    }, [props]);

    return (
        <>
            <Head title="Welcome" />
            <div className="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                <div className="fixed top-0 right-0 px-6 py-4 sm:block">
                    {props.auth.user ? (
                        <div className="flex gap-x-5">
                            <Link
                                href={route("dashboard")}
                                className="text-sm text-gray-700 dark:text-gray-500 underline"
                            >
                                Dashboard
                            </Link>
                            <Link
                                href={route("logout")}
                                className="text-sm text-gray-700 dark:text-gray-500 underline"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </Link>
                        </div>
                    ) : (
                        <>
                            <Link
                                href={route("login")}
                                className="text-sm text-gray-700 dark:text-gray-500 underline"
                            >
                                Log in
                            </Link>
                        </>
                    )}
                </div>
            </div>
        </>
    );
}
