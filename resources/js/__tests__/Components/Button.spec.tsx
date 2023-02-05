import { faker } from "@faker-js/faker";
import { render } from "@testing-library/react";

import { Button } from "@/Components/Button";

it("shows button", () => {
    const title = faker.lorem.word();
    const { getByRole } = render(<Button>{title}</Button>);

    expect(getByRole("button", { name: new RegExp(title, "i") })).toBeDefined();
});
