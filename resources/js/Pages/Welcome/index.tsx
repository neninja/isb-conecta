import { Head } from "@inertiajs/react";
import { router } from "@inertiajs/react";
import { useState } from "react";

import { Footer } from "@/Components/Footer";

import { Intro } from "./Intro";
import { LoginEmail } from "./LoginEmail";
import { LoginPassword } from "./LoginPassword";

type Step = "initial" | "username" | "password";

export default function Welcome() {
    const [step, setStep] = useState<Step>("initial");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    function handleLogin() {
        router.post("/login", { email, password });
    }

    function getStepComponent(step: Step) {
        return {
            initial: <Intro handleContinue={() => setStep("username")} />,
            username: (
                <LoginEmail
                    setEmail={setEmail}
                    handleContinue={() => setStep("password")}
                />
            ),
            password: (
                <LoginPassword
                    setPassword={setPassword}
                    handleContinue={handleLogin}
                />
            ),
        }[step];
    }

    return (
        <>
            <Head title="Bem vindo" />
            <div className="min-h-screen flex flex-col">
                <div
                    className="bg-primary flex items-center justify-center relative min-h-[30vh]
                    after:content-[''] after:rounded-t-full after:bg-neutral-high after:w-[100%] after:h-8 after:absolute after:bottom-0 after:left-0"
                ></div>
                <div className="bg-neutral-high flex-auto flex justify-center">
                    <div className="max-w-[800px] w-8/12 mx-7">
                        {getStepComponent(step)}

                        <div className="mt-5">
                            <Footer />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
