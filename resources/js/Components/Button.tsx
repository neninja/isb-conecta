import { useState } from "react";

interface ButtonProps extends React.ButtonHTMLAttributes<HTMLButtonElement> {
    children: JSX.Element | JSX.Element[] | string;
    size?: "xs" | "sm" | "md" | "lg";
    color?: "primary-pure" | "primary-medium" | "primary-dark";
    fill?: "primary" | "outline" | "ghost";
    iconPosition?: "right" | "left";
    icon?: JSX.Element;
    disabled?: boolean;
    onlyText?: boolean;
    fullWidth?: boolean;
    hasLoading?: boolean;
}

export function Button({
    disabled,
    fullWidth,
    hasLoading,
    size = "md",
    fill = "primary",
    iconPosition,
    icon,
    onClick,
    children,
    ...props
}: ButtonProps) {
    const [clicked, setClicked] = useState(false);

    function handleClick(e: React.MouseEvent<HTMLButtonElement>) {
        e.preventDefault();
        setClicked(true);
        onClick?.(e);
    }

    function getSize() {
        const styles = {
            xs: "text-2xs px-2 py-1 rounded-sm",
            sm: "text-xs px-3 py-2 rounded-md",
            md: "px-4 py-3 rounded-lg",
            lg: "text-lg px-6 py-4 rounded-xl",
        };
        return styles[size];
    }

    function getColorStyles() {
        const styles = {
            primary: `text-neutral-high bg-primary
            hover:bg-primary-medium
            active:bg-primary-dark
            disabled:hover:bg-primary`,
            outline: `border border-primary text-primary bg-neutral-high
            hover:text-primary-medium
            hover:border-primary-medium
            active:text-primary-dark
            active:border-primary-dark
            disabled:hover:text-primary`,
            ghost: `text-primary bg-neutral-high
            hover:text-primary-medium
            active:text-primary-dark
            disabled:hover:text-primary`,
        };

        return styles[fill];
    }

    return (
        <button
            className={`font-bold
                flex items-center justify-center
            ${getSize()}
            ${getColorStyles()}
            ${fullWidth ? "w-full" : ""}
            ${hasLoading && "relative overflow-hidden"}
            disabled:opacity-60
            `}
            disabled={disabled}
            onClick={handleClick}
            {...props}
        >
            {hasLoading && (
                <div
                    className={`bg-primary-dark absolute left-0 h-full transition-all duration-[3000ms]
                    ${clicked ? "w-full" : "w-0"}`}
                ></div>
            )}
            <div className="flex items-center">
                {iconPosition === "left" && <div className="pr-3">{icon}</div>}
                <span className="z-10">{children}</span>
                {iconPosition === "right" && <div className="pl-3">{icon}</div>}
            </div>
        </button>
    );
}
