import "@/config/yup";

import { yupResolver } from "@hookform/resolvers/yup";
import { Head } from "@inertiajs/inertia-react";
import { router } from "@inertiajs/react";
import { useForm, useWatch } from "react-hook-form";
import * as yup from "yup";

import { Button } from "@/Components/Button";
import { ControlledInput } from "@/Components/ControlledInput";
import GuestLayout from "@/Layouts/GuestLayout";

interface Props {
    status?: string;
}

const schema = yup
    .object({
        email: yup.string().email().required(),
        password: yup.string().required(),
    })
    .required();

export default function Login({ status }: Props) {
    const {
        control,
        trigger,
        formState: { errors },
    } = useForm({
        resolver: yupResolver(schema),
        defaultValues: {
            email: "",
            password: "",
        },
    });
    const form = useWatch({ control });

    function handleSubmit(event: React.FormEvent<HTMLFormElement>) {
        event.preventDefault();
        router.post("/login", { email: form.email, password: form.password });
    }

    return (
        <GuestLayout>
            <Head title="Log in" />

            {status && (
                <div className="mb-4 font-medium text-sm text-green-600">
                    {status}
                </div>
            )}

            <form
                className="grid grid-cols-1 gap-x-5 gap-y-5"
                onSubmit={handleSubmit}
            >
                <ControlledInput
                    control={control}
                    trigger={trigger}
                    errors={errors}
                    name="email"
                    label="Email"
                />
                <ControlledInput
                    control={control}
                    trigger={trigger}
                    errors={errors}
                    type="password"
                    name="password"
                    label="Senha"
                />
                <button type="submit">lok</button>

                <Button fullWidth type="submit" fill="primary">
                    Log in
                </Button>
            </form>
        </GuestLayout>
    );
}
