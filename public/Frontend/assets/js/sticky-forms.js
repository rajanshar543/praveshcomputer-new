(() => {
    const enquiryId = 'enquiry-popup';
    const cooldownKey = 'pcs_enquiry_closed_at';
    const cooldownMs = 2 * 60 * 60 * 1000;
    let activePopup = null;

    const closePopup = (popup, remember = true) => {
        if (!popup) return;
        popup.hidden = true;
        popup.classList.remove('is-opening');
        document.body.classList.remove('popup-open');
        if (remember && popup.id === enquiryId) {
            localStorage.setItem(cooldownKey, String(Date.now()));
        }
        if (activePopup === popup) activePopup = null;
    };

    const openPopup = id => {
        const popup = document.getElementById(id);
        if (!popup) return;
        if (activePopup && activePopup !== popup) closePopup(activePopup, false);
        popup.hidden = false;
        popup.classList.add('is-opening');
        document.body.classList.add('popup-open');
        activePopup = popup;
        setTimeout(() => popup.querySelector('input,select,textarea')?.focus(), 120);
    };

    const clearFeedback = form => {
        form.querySelector('.popup-form-feedback')?.remove();
        form.querySelectorAll('.popup-field-error').forEach(error => error.remove());
        form.querySelectorAll('[aria-invalid="true"]').forEach(field => field.removeAttribute('aria-invalid'));
    };

    const showFeedback = (form, message, type) => {
        form.querySelector('.popup-form-feedback')?.remove();
        const feedback = document.createElement('div');
        feedback.className = `popup-form-feedback is-${type}`;
        feedback.setAttribute('role', type === 'success' ? 'status' : 'alert');
        feedback.innerHTML = `<i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i><span>${message}</span>`;
        form.prepend(feedback);
    };

    const showValidationErrors = (form, errors) => {
        Object.entries(errors || {}).forEach(([name, messages]) => {
            const field = form.querySelector(`[name="${CSS.escape(name)}"]`);
            if (!field) return;
            field.setAttribute('aria-invalid', 'true');
            const error = document.createElement('small');
            error.className = 'popup-field-error';
            error.textContent = Array.isArray(messages) ? messages[0] : messages;
            field.insertAdjacentElement('afterend', error);
        });
    };

    document.querySelectorAll('[data-popup-open]').forEach(button => {
        button.addEventListener('click', () => openPopup(button.dataset.popupOpen));
    });

    document.querySelectorAll('[data-popup-close]').forEach(button => {
        button.addEventListener('click', () => closePopup(button.closest('.form-popup')));
    });

    document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && activePopup) closePopup(activePopup);
    });

    document.querySelectorAll('.form-popup .popup-form').forEach(form => {
        form.addEventListener('submit', async event => {
            event.preventDefault();
            clearFeedback(form);

            const submit = form.querySelector('[type="submit"]');
            const originalHtml = submit.innerHTML;
            submit.disabled = true;
            submit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Please wait...';

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });
                const data = await response.json();

                if (!response.ok) {
                    showValidationErrors(form, data.errors);
                    showFeedback(form, data.message || 'Please check the highlighted fields and try again.', 'error');
                    return;
                }

                form.reset();
                showFeedback(form, data.message || 'Your request has been submitted successfully.', 'success');
                if (form.closest('.form-popup')?.id === enquiryId) {
                    localStorage.setItem(cooldownKey, String(Date.now()));
                }
            } catch (error) {
                showFeedback(form, 'We could not submit the form right now. Please try again or call us.', 'error');
            } finally {
                submit.disabled = false;
                submit.innerHTML = originalHtml;
            }
        });
    });

    const lastClosed = Number(localStorage.getItem(cooldownKey) || 0);
    if (!lastClosed || Date.now() - lastClosed >= cooldownMs) {
        setTimeout(() => openPopup(enquiryId), 1400);
    }
})();
