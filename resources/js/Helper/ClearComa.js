export function clearfloor(number) {
    if (number === null || number === undefined) {
        return 0;
    }
    return Math.floor(number);
}