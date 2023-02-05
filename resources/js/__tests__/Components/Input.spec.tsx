import { faker } from "@faker-js/faker";
import { render } from "@testing-library/react";

import { Input } from "@/Components/Input";

it("shows input label", () => {
    const label = faker.lorem.word();
    const { getByLabelText } = render(<Input label={label} />);

    expect(getByLabelText(new RegExp(label, "i"))).toBeDefined();
});
