document.addEventListener('alpine:init', () => {
    Alpine.data('calendar', calendar)
})

function calendar() {
    const today = new Date();

    const currentMont = today.getMonth();

    const currentDay = today.getDate();
    let firstDayOfCurrentMonth = new Date(today.getFullYear(), currentMont, 1);
    let lastDayOfCurrentMonth = new Date(today.getFullYear(), currentMont + 1, 0);

    let prependDays = firstDayOfCurrentMonth.getDay();
    let appendDays = 6 - lastDayOfCurrentMonth.getDay();

    let weeks = (prependDays + lastDayOfCurrentMonth.getDate() + appendDays) / 7;

    const days = Array.from({ length: weeks * 7 }, (_, i) => {
        const day = new Date(today.getFullYear(), currentMont, i + 1 - prependDays);
        return {
            day: day.getDate(),
            date: day.toISOString().split('T')[0],
            isCurrentMonth: day.getMonth() === currentMont,
            isToday: day.getDate() === currentDay
        };
    });

    return {
        today,
        days,
        weeks,
    };
}

