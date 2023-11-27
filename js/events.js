document.addEventListener('DOMContentLoaded', () => {
    const make_account_form = document.getElementById('make_account_f');
    const login_form = document.getElementById('login_f');
    const create_account_button = document.getElementById('make_account_b');
    const login_button = document.getElementById('login_b');
    const paragraph_1 = document.getElementById('p1');

    create_account_button.addEventListener('click', () => {
        make_account_form.classList.remove("hidden");
        create_account_button.classList.add("hidden");
        paragraph_1.classList.add('hidden');
        login_button.classList.add('hidden');
    });

    login_button.addEventListener('click', () => {
        login_form.classList.remove('hidden');
        create_account_button.classList.add('hidden');
        login_button.classList.add('hidden');
        paragraph_1.classList.add('hidden');
    });
});