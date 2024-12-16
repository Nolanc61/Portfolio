<script>
  function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
      const token = await grecaptcha.enterprise.execute('6LdvGp0qAAAAAILF-p-3vMrqCnmPigL7EPTNvqDd', {action: 'LOGIN'});
    });
  }
</script>
