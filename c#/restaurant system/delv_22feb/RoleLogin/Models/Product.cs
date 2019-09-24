using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace RoleLogin.Models
{
    public class Product
    {
        public Department Department;
        [Key]
        public int ProductId { get; set; }

        [Required]
        public int DepartmentId { get; set; }

        [Required]
        public string ProductName { get; set; }

        [Required]
        public string SupplierName { get; set; }

        [Required]
        public string SupplierDetail { get; set; }

     }
}