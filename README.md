### Task Overview

```markdown
You will build a simple order management system where users can:
✅ Register and log in (Sanctum authentication).
✅ Create, update, and delete orders.
✅ Fetch real-time exchange rates from an external API.
✅ Implement global logging for important actions.

Authentication

Use Laravel Sanctum for API authentication.
Orders API

Implement CRUD operations for orders.
An order should have: id, user_id, product_name, amount, and status.
Ensure only the creator of an order can update or delete it.

Global Logging

Log every order action (create, update, delete) in a custom action_logs table.
Each log should store the user ID, action type, and timestamp.
Bonus (If You Want to Impress Us) 🚀

Implement caching for API responses.
Use event listeners for logging instead of directly writing in controllers.
Add unit tests for the order module.
```
