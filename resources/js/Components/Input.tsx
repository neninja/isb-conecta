import { useId, useState } from "react";
import { MdOutlineVisibility } from "react-icons/md";

interface InputProps extends React.InputHTMLAttributes<HTMLInputElement> {
    label?: string;
    error?: string;
    textarea?: boolean;
    caption?: string;
    leftIcon?: JSX.Element;
    rightIcon?: JSX.Element;
    onChangeLazy?: (e: React.FormEvent<HTMLInputElement>) => void;
}

export function Input({
    textarea,
    label,
    error,
    caption,
    leftIcon,
    rightIcon,
    disabled,
    onChange,
    onBlur,
    onChangeLazy,
    type = "text",
    ...rest
}: InputProps) {
    const [timer, setTimer] = useState<NodeJS.Timeout | null>(null);
    const [currentType, setCurrentType] = useState(type);
    const labelId = useId();

    function getIconColor() {
        if (!!rightIcon && !!leftIcon) {
            return "";
        }

        if (error) {
            return "text-error";
        }

        if (disabled) {
            return "text-neutral-high-dark";
        }

        return "text-neutral-low-medium";
    }

    function getElement() {
        if (textarea) {
            return (
                <textarea
                    className={`block w-full rounded-md
                        px-4 py-3
                        placeholder-neutral-low-light
                        focus:ring-0
                        focus:border-primary
                        focus:text-neutral-low-medium
                        hover:border-neutral-low-medium
                        hover:text-neutral-low-medium
                        disabled:border-neutral-high-dark
                        disabled:placeholder-neutral-high-dark
                        ${error ? "border-error" : "border-neutral-low-light"}
                        `}
                    value={rest.value}
                    aria-labelledby={labelId}
                    disabled={disabled}
                ></textarea>
            );
        }

        if (type === "password") {
            rightIcon = (
                <MdOutlineVisibility
                    className="cursor-pointer"
                    onClick={function () {
                        setCurrentType(
                            currentType === "password" ? "text" : "password",
                        );
                    }}
                />
            );
        }

        return (
            <input
                className={`block w-full rounded-md
                        px-4 py-3
                        placeholder-neutral-low-light
                        focus:ring-0
                        focus:border-primary
                        focus:text-neutral-low-medium
                        hover:border-neutral-low-medium
                        hover:text-neutral-low-medium
                        disabled:border-neutral-high-dark
                        disabled:placeholder-neutral-high-dark
                        ${error ? "border-error" : "border-neutral-low-light"}
                        ${leftIcon ? "pl-7" : ""}
                        ${rightIcon ? "pr-7" : ""}
                        `}
                aria-labelledby={labelId}
                type={currentType}
                disabled={disabled}
                {...rest}
                onBlur={(e) => {
                    if (timer && onChangeLazy) {
                        clearTimeout(timer);
                        onChangeLazy(e);
                    }

                    if (onBlur) {
                        onBlur(e);
                    }
                }}
                onChange={(e) => {
                    if (onChangeLazy) {
                        if (timer) {
                            clearTimeout(timer);
                        }
                        setTimer(
                            setTimeout(() => {
                                onChangeLazy(e);
                            }, 2000),
                        );
                    }
                    if (onChange) {
                        onChange(e);
                    }
                }}
            />
        );
    }

    return (
        <div>
            {label && (
                <label
                    className="text-neutral-low-medium text-xs mb-2"
                    id={labelId}
                >
                    {label}
                </label>
            )}
            <div
                className={`mt-1 relative ${getIconColor()} focus-within:text-primary`}
            >
                {leftIcon && (
                    <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        {leftIcon}
                    </div>
                )}

                {getElement()}

                {rightIcon && (
                    <div
                        className={`absolute inset-y-0 right-0 flex items-center pr-3 ${
                            type !== "password" ? "pointer-events-none " : ""
                        }`}
                    >
                        {rightIcon}
                    </div>
                )}
            </div>
            {caption && (
                <p className="mt-1 text-2xs text-neutral-low-medium">
                    {caption}
                </p>
            )}
            {error && <p className="mt-1 text-2xs text-error">{error}</p>}
        </div>
    );
}
