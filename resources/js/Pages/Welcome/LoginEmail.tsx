import "@/config/yup";

import { yupResolver } from "@hookform/resolvers/yup";
import { useEffect } from "react";
import { useForm, useWatch } from "react-hook-form";
import * as yup from "yup";

import { Button } from "@/Components/Button";
import { ControlledInput } from "@/Components/ControlledInput";

interface LoginEmailProps {
    handleContinue: () => void;
    setEmail: (v: string) => void;
}

const schema = yup
    .object({
        email: yup.string().email().required(),
    })
    .required();

export function LoginEmail({ handleContinue, setEmail }: LoginEmailProps) {
    const {
        control,
        trigger,
        formState: { errors, isValid },
    } = useForm({
        resolver: yupResolver(schema),
        defaultValues: {
            email: "",
            password: "",
        },
    });
    const form = useWatch({ control });

    useEffect(() => {
        if (isValid) {
            setEmail(form.email ?? "");
        }
    }, [form, isValid]);

    return (
        <>
            <h1 className="text-xl text-primary">Realize seu login</h1>
            <p className="text-neutral-low my-5">
                Para realizar seu login basta entrar com o nome de usuário e a
                senha pré-definida que foi repassada para você. Caso não a tenha
                entre em contato com seu supervisor.
            </p>

            <form>
                <ControlledInput
                    control={control}
                    trigger={trigger}
                    errors={errors}
                    name="email"
                    label="Digite seu email"
                />

                <div className="mt-5">
                    <Button
                        type="submit"
                        onClick={handleContinue}
                        fullWidth
                        disabled={!isValid}
                    >
                        Prosseguir
                    </Button>
                </div>
            </form>
        </>
    );
}
