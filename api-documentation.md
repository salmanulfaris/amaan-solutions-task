**[Go Back](./README.md)**
# **Order API Documentation**

## **Base URL**
```
https://your-api-url.com/api
```

## **Authentication**
All endpoints require authentication using **Sanctum**. Include the `Authorization` header with a Bearer token.

```
Authorization: Bearer YOUR_ACCESS_TOKEN
```
---
## Register
### **Endpoint**
```
POST /user/register
```
### **Body Parameters**
| Field    | Type   | Required | Description      |
|----------|--------|----------|------------------|
| name     | string | ✅ Yes  | Name of  User    |
| email    | string | ✅ Yes  | Email of  User   |
| password | integer | ✅ Yes  | Password Of User |

Response Body
```json
{
    "user": {
        "name": "Example",
        "email": "example@gmail.com",
        "updated_at": "2025-02-22T18:21:06.000000Z",
        "created_at": "2025-02-22T18:21:06.000000Z",
        "id": 1
    },
    "token": "1|LITqhTiTO0YVLkRR03VN8JVTCfV6nhPiq29g6wYA0a02db8c"
}
```
---

## Login
### **Endpoint**
```
POST /user/login
```
### **Body Parameters**
| Field    | Type   | Required | Description      |
|----------|--------|----------|------------------|
| email    | string | ✅ Yes  | Email of  User   |
| password | integer | ✅ Yes  | Password Of User |

```json
{
    "user": {
        "name": "Example",
        "email": "example@gmail.com",
        "updated_at": "2025-02-22T18:21:06.000000Z",
        "created_at": "2025-02-22T18:21:06.000000Z",
        "id": 1
    },
    "token": "1|LITqhTiTO0YVLkRR03VN8JVTCfV6nhPiq29g6wYA0a02db8c"
}
```
---

## **1️⃣ Get All Orders**
Retrieve all orders of the authenticated user.

### **Endpoint**
```
GET /order
```

### **Headers**
| Key           | Value                |
|--------------|----------------------|
| Authorization | Bearer YOUR_TOKEN |

### **Response**
**200 OK**
```json
[
    {
        "id": 1,
        "product_name": "Laptop",
        "amount": 1500,
        "status": "placed",
        "user_id": 5,
        "created_at": "2025-02-22T10:00:00Z"
    }
]
```

---

## **2️⃣ Create an Order**
Creates a new order.

### **Endpoint**
```
POST /order
```

### **Headers**
| Key           | Value                |
|--------------|----------------------|
| Authorization | Bearer YOUR_TOKEN |
| Content-Type | application/json |

### **Body Parameters**
| Field         | Type   | Required | Description                |
|--------------|--------|----------|----------------------------|
| product_name | string | ✅ Yes  | Name of the product       |
| amount       | integer | ✅ Yes  | Quantity of the product  |

### **Example Request**
```json
{
    "product_name": "Smartphone",
    "amount": 2
}
```

### **Response**
**201 Created**
```json
{
    "id": 2,
    "product_name": "Smartphone",
    "amount": 2,
    "status": "placed",
    "user_id": 5,
    "created_at": "2025-02-22T10:05:00Z"
}
```

**401 Unauthorized**
```json
{
    "error": "Unauthorized action."
}
```

---

## **3️⃣ Get Single Order**
Retrieve a specific order by ID.

### **Endpoint**
```
GET /order/{id}
```

### **Path Parameter**
| Parameter | Type   | Required | Description           |
|-----------|--------|----------|-----------------------|
| id        | string | ✅ Yes  | Order ID to retrieve |

### **Response**
**200 OK**
```json
{
    "id": 1,
    "product_name": "Laptop",
    "amount": 1500,
    "status": "placed",
    "user_id": 5,
    "created_at": "2025-02-22T10:00:00Z"
}
```

**404 Not Found**
```json
{
    "error": "Order not found."
}
```

---

## **4️⃣ Update an Order**
Update an existing order.

### **Endpoint**
```
PUT /order/{id}
```

### **Headers**
| Key           | Value                |
|--------------|----------------------|
| Authorization | Bearer YOUR_TOKEN |
| Content-Type | application/json |

### **Path Parameter**
| Parameter | Type   | Required | Description           |
|-----------|--------|----------|-----------------------|
| id        | string | ✅ Yes  | Order ID to update   |

### **Body Parameters** *(Only send fields to update)*
| Field        | Type    | Required | Description                     |
|-------------|---------|----------|---------------------------------|
| product_name | string  | ✅ Yes  | New name of the product        |
| amount      | integer | ✅ Yes  | New quantity of the product    |
| status      | string  | ✅ Yes | Must be one of `placed`, `shipped`, `delivered` |

### **Example Request**
```json
{
    "amount": 3,
    "status": "shipped"
}
```

### **Response**
**200 OK**
```json
{
    "id": 1,
    "product_name": "Laptop",
    "amount": 3,
    "status": "shipped",
    "user_id": 5,
    "updated_at": "2025-02-22T11:00:00Z"
}
```

**401 Unauthorized**
```json
{
    "error": "Unauthorized action."
}
```

**404 Not Found**
```json
{
    "error": "Order not found."
}
```

---

## **5️⃣ Delete an Order**
Delete an order by ID.

### **Endpoint**
```
DELETE /order/{id}
```

### **Path Parameter**
| Parameter | Type   | Required | Description           |
|-----------|--------|----------|-----------------------|
| id        | string | ✅ Yes  | Order ID to delete   |

### **Response**
**200 OK**
```json
{
    "message": "Order deleted successfully."
}
```

**401 Unauthorized**
```json
{
    "error": "Unauthorized action."
}
```

**404 Not Found**
```json
{
    "error": "Order not found."
}
```

---

## **Error Handling**
| Status Code | Meaning |
|------------|---------|
| 401 | Unauthorized - Token missing or invalid |
| 403 | Forbidden - User is not allowed to perform the action |
| 404 | Not Found - Order does not exist |
| 422 | Unprocessable Entity - Validation error |
| 500 | Internal Server Error - Something went wrong |

---

### ✅ **Notes**
- `status` field only accepts values from `config('enums.order_status')`
- **Only provided fields are updated** in the `PUT /order/{id}` request.
- **All requests require authentication.**

---







### **🔹 Get Exchange Rates**
**Endpoint:**
```
GET /api/exchange-rate/{currencyCode}
```

**📌 Example Request:**
```
GET /api/exchange-rate/USD
```

**📌 Example Response:**
```json
{
  "base": "USD",
  "date": "2025-02-22",
  "rates": {
    "EUR": 0.92,
    "INR": 83.45,
    "GBP": 0.79,
    "JPY": 145.23
  }
}
```

**📌 Error Response (Invalid Currency Code): Status Code : 500**
```json
{
  "error": "Failed to fetch exchange rates."
}
```
