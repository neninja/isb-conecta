/* eslint-disable @typescript-eslint/no-explicit-any */
import {
    Control,
    Controller,
    FieldErrorsImpl,
    UseFormTrigger,
} from "react-hook-form";

import { Input } from "./Input";

interface ControlledInputProps {
    name: string;
    label: string;
    placeholder?: string;
    control: Control<any>;
    type?: "text" | "date" | "password";
    mask?: ((v: string) => string) | null;
    errors: FieldErrorsImpl;
    trigger: UseFormTrigger<any>;
    disabled?: boolean;
    maxLength?: number;
    onBlur?: () => void;
}

export function ControlledInput({
    name,
    label,
    placeholder,
    mask,
    control,
    errors,
    trigger,
    type = "text",
    disabled,
    maxLength,
    onBlur,
}: ControlledInputProps) {
    return (
        <Controller
            name={name}
            control={control}
            render={({ field }) => (
                <Input
                    label={label}
                    type={type}
                    disabled={disabled}
                    placeholder={placeholder}
                    value={field.value || ""}
                    error={errors?.[field.name]?.message?.toString()}
                    maxLength={maxLength}
                    onChangeLazy={() => {
                        trigger(field.name);
                    }}
                    onChange={(e) => {
                        if (mask) {
                            e.target.value = mask(e.target.value);
                        }
                        field.onChange(e);
                    }}
                    onBlur={() => {
                        if (onBlur) {
                            onBlur();
                        }
                    }}
                />
            )}
        />
    );
}
