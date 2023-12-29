<script>
    location.href = localStorage.getItem("token") == null ? "/login"  : "/dashboard"
</script>