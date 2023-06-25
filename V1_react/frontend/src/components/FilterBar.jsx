import React, { useState, useEffect } from 'react';
import axios from 'axios';

const FilteredDataComponent = () => {
  const [posts, setPosts] = useState([]);
  const [filters, setFilters] = useState({
    category: '',
    price: '',
    city: '',
    date: ''
  });
  const [filteredData, setFilteredData] = useState([]);


  const handleFilterChange = (event) => {
    const { name, value } = event.target;
    setFilters((prevFilters) => ({ ...prevFilters, [name]: value }));
  };
  console.log(filters)


  // const filterData = () => {
  //   let filteredPosts = [...posts];

  //   // Apply category filter
  //   if (filters.category) {
  //     filteredPosts = filteredPosts.filter((post) => post.category == filters.category);
  //   }

  //   // Apply price filter
  //   if (filters.price) {
  //     filteredPosts = filteredPosts.filter((post) => post.price <= parseInt(filters.price));
  //   }

  //   // Apply city filter
  //   if (filters.city) {
  //     filteredPosts = filteredPosts.filter((post) => post.city == filters.city);
  //   }

  //   // Apply date filter
  //   if (filters.date) {
  //     filteredPosts = filteredPosts.filter((post) => post.date == filters.date);
  //   }

  //   setFilteredData(filteredPosts);
  // };


//fetching the users data
useEffect(() => {
    const fetchPosts = async () => {
        try {
            const response = await axios.get(
                "http://127.0.0.1:8000/api/post/findall"
            );
            console.log(response.data.posts)
            setPosts(response.data.posts);
        } catch (error) {
            console.error("Error:", error);
        }
    };

    fetchPosts();
}, []);


    // }
    const filtred = posts.filter((post) => (post.category == filters.category || post.price <= filters.category || post.city == filters.city));
    console.log('filtred' , filtred)


  return (
    <div>
        <form >
        <select name="category" value={filters.category} onChange={handleFilterChange}>
          <option value="">Select Category</option>
          <option value="1">machines</option>
          <option value="2">immobilier</option>
          {/* Add more category options as needed */}
        </select>

        <select name="price" value={filters.price} onChange={handleFilterChange}>
          <option value="">Select Price</option>
          <option value="100">100</option>
          <option value="400">400</option>
          {/* Add more price options as needed */}
        </select>

        <select name="city" value={filters.city} onChange={handleFilterChange}>
          <option value="">Select City</option>
          <option value="1">khouribga</option>
          <option value="2">agadire</option>
          {/* Add more city options as needed */}
        </select>

        <input
          type="date"
          name="date"
          value={filters.date}
          onChange={handleFilterChange}
        />
      </form>
      

    {/* {success && <p className="alert alert-success">{success}</p>} */}
    <table class="table mt-5  table-bordered">
        <thead className="table-primary ">
            <tr>
                <th scope="col">image</th>
                <th scope="col">title</th>
                <th scope="col">prix</th>
                <th scope="col">email</th>
                <th scope="col">Ville</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            {filtred.map((post) => (
                <tr className="text-left" key={post.id}>
                    <img src={`/backend/public/${post.picture_1}`} alt={post.title} />
                    <td>{post.title}</td>
                    <td>{post.price}</td>
                    <td>{post.email}</td>
                    <td>{post.city}</td>
                    <td>{(post.created_at).split('T')[0]}</td>
                </tr>
            ))}
        </tbody>
    </table>
    </div>
  );
};

export default FilteredDataComponent;
