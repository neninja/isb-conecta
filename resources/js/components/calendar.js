document.addEventListener('alpine:init', () => {
    Alpine.data('calendar', calendar)
})

function calendar($wire, $model) {
    const today = new Date();
    const currentMonth = today.getMonth();
    const currentYear = today.getFullYear();

    const daysFromDate = (date) => {
        const today = new Date();
        const todayISO = today.toISOString().split('T')[0];

        const month = date.getMonth();
        const year = date.getFullYear();

        let firstDayOfMonth = new Date(year, month, 1);
        let lastDayOfMonth = new Date(year, month + 1, 0);

        let prependDays = firstDayOfMonth.getDay();
        let appendDays = 6 - lastDayOfMonth.getDay();

        let weeks = (prependDays + lastDayOfMonth.getDate() + appendDays) / 7;

        return Array.from({ length: weeks * 7 }, (_, i) => {
            const day = new Date(year, month, i + 1 - prependDays);
            return {
                day: day.getDate(),
                date: day.toISOString().split('T')[0],
                fromSelectedMonth: day.getMonth() === month,
                isToday: day.toISOString().split('T')[0] === todayISO,
                isSelected: false,
            };
        });
    }

    return {
        selectedDate: $wire.entangle($model).live,
        selectedYear: currentYear,
        selectedMonth: currentMonth,
        months: [
            'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
        ],
        today,
        days: daysFromDate(today),

        updateDisplayedDays() {
            let firstDayOfMonth = new Date(this.selectedYear, this.selectedMonth, 1);
            this.days = daysFromDate(firstDayOfMonth)
            this.selectedDate = null;
        },

        nextMonth() {
            if (this.selectedMonth < 11) {
                this.selectedMonth++;
            } else {
                this.selectedMonth = 0;
                this.selectedYear++;
            }
            this.updateDisplayedDays()
        },
        previousMonth() {
            if (this.selectedMonth > 0) {
                this.selectedMonth--;
            } else {
                this.selectedMonth = 11;
                this.selectedYear--;
            }
            this.updateDisplayedDays()
        },
        handleSelectDay(day) {
            this.days.forEach(day => day.isSelected = false);
            day.isSelected = true;
            this.selectedDate = day.date;
        }
    };
}
